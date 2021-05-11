import { Router } from "express";

import UserController from "./controllers/UserController";

const router = Router();
const userController = new UserController();

router.get("/users", userController.showAll);
router.get("/user/:id", userController.show);
router.post("/user/log-in", userController.login);
router.post("/user", userController.create);

export default router;
