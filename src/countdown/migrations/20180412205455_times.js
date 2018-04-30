exports.up = function(knex, Promise) {
  return Promise.all([
    knex.schema.createTable('times', function(table) {
      table.increments('id').primary();
      table.string('since');
      table.string('from');
      table.string('dateSelector')
      table.integer('user_id').unsigned().notNullable().references('id').inTable('users');
    }),
  ]);
};

exports.down = function(knex, Promise) {
  return Promise.all([
    knex.schema.dropTable('times'),
  ]);
};