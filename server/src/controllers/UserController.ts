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

  async showAll(req: Request, res: Response) {
    try {
      const userService = new UserService();
      const users = await userService.showAll();

      return res.status(200).json(users);
    } catch (err) {
      return res.status(500);
    }
  }

  async show(req: Request, res: Response) {
    try {
      const { id } = req.params;
      const userService = new UserService();
      const user = await userService.show(id);

      return res.status(200).json(user);
    } catch (err) {
      return res.status(500);
    }
  }

  async login(req: Request, res: Response) {
    try {
      const { name_our_email, password } = req.body;
      const userService = new UserService();
      const user = await userService.login(name_our_email, password);

      return res.status(200).json(user);
    } catch (err) {
      return res.status(500);
    }
  }
}
