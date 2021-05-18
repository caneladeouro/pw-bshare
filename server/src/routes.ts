import { Router } from "express";
import { FolderController } from "./controllers/FolderController";
import multer from "multer";

import UserController from "./controllers/UserController";

import uploadConfig from "./config/upload";
import { ProjectController } from "./controllers/ProjectController";

const router = Router();
const upload = multer(uploadConfig);
const userController = new UserController();
const folderController = new FolderController();
const projectController = new ProjectController();

// User
router.get("/users", userController.showAll);
router.get("/user/:id", userController.show);
router.post("/user/log_in", userController.login);
router.post("/user", userController.create);

// Folder
router.get("/folders/:user_id", folderController.showAllByUser);
router.get("/folder/:id/:user_id", folderController.showUserFolderContent);
router.post("/folder", folderController.create);

// Projects
router.get("/projects", projectController.showAll);
router.post(
  "/project",
  upload.fields([
    { name: "project", maxCount: 1 },
    { name: "main_image", maxCount: 1 },
    { name: "images", maxCount: 3 },
  ]),
  projectController.create
);

export default router;
