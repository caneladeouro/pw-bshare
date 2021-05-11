import express from "express";

import router from "./routes";

import "./database/ConnectionDatabase";

const server = express();

server.use(express.json());
server.use(router);

server.listen(3100, () => {
  console.log("🚀 Server started on http://localhost:3100");
});
