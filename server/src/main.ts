import express from "express";
import { join } from "path";

import router from "./routes";

import "./database/ConnectionDatabase";

const server = express();

server.use(express.json());
server.use(router);
server.use("/uploads", express.static(join(__dirname, "..", "uploads")));

server.listen(3100, () => {
  console.log("🚀 Server started on http://localhost:3100");
});
