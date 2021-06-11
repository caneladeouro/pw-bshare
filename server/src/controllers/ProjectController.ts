import { Request, Response } from "express";
import { ProjectService } from "../services/ProjectService";

class ProjectController {
  async create(req: Request, res: Response) {
    const projectService = new ProjectService();
    const requestFiles = req.files as Express.Multer.File[];
    const images = requestFiles["images[]"].map(
      (image: Express.Multer.File) => {
        return { image: image.filename };
      }
    );
    const project = await projectService.create({
      ...req.body,
      images,
      project: requestFiles["project"][0].filename,
      main_image: requestFiles["main_image"][0].filename,
    });

    return res.status(201).json(project);
  }

  async showAll(req: Request, res: Response) {
    const projectService = new ProjectService();
    const projects = await projectService.showAll();

    return res.status(200).json(projects);
  }

  async showById(req: Request, res: Response) {
    const { id } = req.params;
    const projectService = new ProjectService();
    const project = await projectService.showById(id);

    return res.status(200).json(project);
  }

  async showByUser(req: Request, res: Response) {
    const { author_id } = req.params;
    const projectService = new ProjectService();
    const projects = await projectService.showByUser(author_id);

    return res.status(200).json(projects);
  }
}

export { ProjectController };
