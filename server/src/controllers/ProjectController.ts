import { Request, Response } from "express";
import { ProjectService } from "../services/ProjectService";

class ProjectController {
  async create(req: Request, res: Response) {
    const main_image_test = req.file as Express.Multer.File;
    const image = main_image_test.filename;

    return res.status(201).json(req.body);
  }

  async showAll(req: Request, res: Response) {
    const projectService = new ProjectService();
    const projects = await projectService.showAll();

    return res.status(200).json(projects);
  }
}

export { ProjectController };
