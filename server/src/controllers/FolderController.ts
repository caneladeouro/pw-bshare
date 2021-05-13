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

  async showAllByUser(req: Request, res: Response) {
    try {
      const { user_id } = req.params;
      const folderService = new FolderService();
      const folders = await folderService.showAllByUser(user_id);

      return res.status(200).json(folders);
    } catch (err) {
      return res.status(500);
    }
  }

  async showUserFolderContent(req: Request, res: Response) {
    try {
      const { id, user_id } = req.params;
      const folderService = new FolderService();
      const folder = await folderService.showUserFolderContent({ id, user_id });

      return res.status(200).json(folder);
    } catch (err) {
      return res.status(500);
    }
  }
}

export { FolderController };
