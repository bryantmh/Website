const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cors());
app.use(express.static('dist'));

// Knex Setup
const env = process.env.NODE_ENV || 'development';
const config = require('./knexfile')[env];  
const knex = require('knex')(config);

// bcrypt setup
let bcrypt = require('bcrypt');
const saltRounds = 10;

app.get('/api/users/:id/items/:time', (req, res) => {
  let id = parseInt(req.params.id);
  let time = parseInt(req.params.time);
  knex('users').join('times', 'users.id', 'times.user_id')
    .where('users.id', id)
    .where('times.id', time)
    .select('from', 'since').then(times => {
      res.status(200).json({item:times});
    }).catch(error => {
      res.status(500).json({error});
    });
});

app.get('/api/users/:id/items/', (req, res) => {
  let id = parseInt(req.params.id);
  knex('times')
    .where('user_id', id)
    .then(times => {
      res.status(200).json({items:times});
    }).catch(error => {
      res.status(500).json({error});
    });
});

app.post('/api/users/:id/items/', (req, res) => {
  let id = parseInt(req.params.id);
  knex('times').insert({user_id: id, since:req.body.since, from: req.body.from})
  .then(response => {
    res.status(200).json({since:req.body.since, from: req.body.from});
    return;
  }).catch(error => {
    console.log(error);
    res.status(500).json({ error });
  });
});

app.delete('/api/items/:time', (req, res) => {
  let time = parseInt(req.params.time);
  knex('times').where({id: time}).del()
  .then(response => {
    res.status(200);
    return;
  }).catch(error => {
    res.status(500).json({error});
  });
});


//Login
app.post('/api/login', (req, res) => {
  if (!req.body.email || !req.body.password)
    return res.status(400).send();
  knex('users').where('email',req.body.email).first().then(user => {
    if (user === undefined) {
      res.status(403).send("Invalid credentials");
      throw new Error('abort');
    }
    return [bcrypt.compare(req.body.password, user.hash),user];
  }).spread((result,user) => {
    if (result)
      res.status(200).json({user:{username:user.username,name:user.name,id:user.id}});
    else
      res.status(403).send("Invalid credentials");
    return;
  }).catch(error => {
    if (error.message !== 'abort') {
      console.log(error);
      res.status(500).json({ error });
    }
  });
});

app.post('/api/users', (req, res) => {
  if (!req.body.email || !req.body.password || !req.body.username || !req.body.name)
    return res.status(400).send();
  knex('users').where('email',req.body.email).first().then(user => {
    if (user !== undefined) {
      res.status(403).send("Email address already exists");
      throw new Error('abort');
    }
    return knex('users').where('username',req.body.username).first();
  }).then(user => {
    if (user !== undefined) {
      res.status(409).send("User name already exists");
      throw new Error('abort');
    }
    return bcrypt.hash(req.body.password, saltRounds);
  }).then(hash => {
    return knex('users').insert({email: req.body.email, hash: hash, username:req.body.username,
         name:req.body.name, role: 'user'});
  }).then(ids => {
    return knex('users').where('id',ids[0]).first().select('username','name','id');
  }).then(user => {
    res.status(200).json({user:user});
    return;
  }).catch(error => {
    if (error.message !== 'abort') {
      console.log(error);
      res.status(500).json({ error });
    }
  });
});

app.listen(3001, () => console.log('Server listening on port 3001!'));
