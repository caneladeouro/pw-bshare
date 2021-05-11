module.exports = {
  name: "default",
  type: process.env.ORM_CONNECTION,
  host: process.env.ORM_HOST,
  port: 3306,
  username: process.env.ORM_USERNAME,
  password: process.env.ORM_PASSWORD,
  database: process.env.ORM_DATABASE,
  migrations: ["./src/database/migrations/*.ts"],
  entities: ["./src/entities/*.ts"],
  cli: {
    migrationsDir: "./src/database/migrations",
  },
};
