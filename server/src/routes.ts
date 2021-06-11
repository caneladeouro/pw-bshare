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
router.get("/users/:id", userController.show);
router.post("/users/log_in", userController.login);
router.post("/users", userController.create);

// Folder
router.get("/folders/:user_id", folderController.showAllByUser);
router.get("/folders/:id/:user_id", folderController.showUserFolderContent);
router.post("/folders", folderController.create);

// Projects
router.get("/projects", projectController.showAll);
router.post(
  "/projects",
  upload.fields([
    { name: "project", maxCount: 1 },
    { name: "main_image", maxCount: 1 },
    { name: "images[]", maxCount: 3 },
  ]),
  projectController.create
);
router.get("/projects/:id", projectController.showById);

export default router;
