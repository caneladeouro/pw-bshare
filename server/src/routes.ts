import { Router } from "express";
import { FolderController } from "./controllers/FolderController";

import UserController from "./controllers/UserController";

const router = Router();
const userController = new UserController();
const folderController = new FolderController();

// User
router.get("/users", userController.showAll);
router.get("/user/:id", userController.show);
router.post("/user/log-in", userController.login);
router.post("/user", userController.create);

// Folder
router.get("/folders/:user_id", folderController.showAllByUser);
router.post("/folder", folderController.create);

export default router;
