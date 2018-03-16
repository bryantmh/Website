const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(cors());
app.use(express.static('dist'));


var items = [];
var id = -1;

app.get('/api/items/:id', (req, res) => {
  let id = parseInt(req.params.id);
  let index = items.map(item => { return item.id; }).indexOf(id);
  res.send(items[index]);
});

app.get('/api/items/', (req, res) => {
  res.send(items);
});

app.put('/api/items/:id', (req, res) => {
  let id = parseInt(req.params.id);
  let index = items.map(item => { return item.id; }).indexOf(id);
  items[index].since = req.body.since
  items[index].from = req.body.from
  items[index].dateSelector = req.body.dateSelector
  res.send(200);
});

app.post('/api/items', (req, res) => {
  id = id + 1;
  let item = {id:id, since:req.body.since, from: req.body.from, dateSelector: req.body.dateSelector};
  items.push(item);
  res.send(item);
});

app.delete('/api/items/:id', (req, res) => {
  let id = parseInt(req.params.id);
  let removeIndex = items.map(item => { return item.id; }).indexOf(id);
  if (removeIndex === -1) {
    res.status(404).send("Sorry, that item doesn't exist");
    return;
  }
  items.splice(removeIndex, 1);
  res.sendStatus(200);
});

app.listen(3001, () => console.log('Server listening on port 3001!'));
