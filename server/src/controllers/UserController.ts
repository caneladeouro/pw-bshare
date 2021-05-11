import { Request, Response } from "express";
import UserService from "../services/UserService";

export default class UserController {
  async create(req: Request, res: Response) {
    try {
      const userService = new UserService();
      const { username, email, password } = req.body;

      const user = await userService.create({ username, email, password });
      return res.status(201).json(user);
    } catch (err) {
      return res.status(500);
    }
  }
}
