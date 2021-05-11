import { Request, Response } from "express";
import { FolderService } from "../services/FolderService";

class FolderController {
  async create(req: Request, res: Response) {
    try {
      const { path, user_id, card_id } = req.body;
      const folderService = new FolderService();
      const folder = await folderService.create({ path, user_id, card_id });

      return res.status(200).json(folder);
    } catch (err) {
      return res.status(500);
    }
  }
}

export { FolderController };
