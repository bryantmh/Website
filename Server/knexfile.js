// Update with your config settings.

module.exports = {

  development: {
    client: 'mariasql',
    connection: {
      unixSocket    : '/var/run/mysqld/mysqld.sock',
      user     : 'root',
      password : '',
      db : 'countdown',
      charset  : 'utf8'
    }
  }
};
