import { getCustomRepository, Repository } from "typeorm";
import { Folder } from "../entities/Folder";
import { FolderRepository } from "../repositorys/FolderRepository";

class FolderService {
  private folderRepository: Repository<Folder>;

  constructor() {
    this.folderRepository = getCustomRepository(FolderRepository);
  }

  async create({ path, user_id, card_id }: IFolder) {
    const folderAlreadyExist = await this.folderRepository.findOne({
      path,
    });

    if (folderAlreadyExist) {
      return;
    }

    const folder = this.folderRepository.create({
      path,
      user_id,
      card_id,
    });

    await this.folderRepository.save(folder);
    return folder;
  }

  async showAllByUser(user_id: string) {
    const folders = await this.folderRepository.find({
      user_id,
    });

    return folders;
  }
}

export { FolderService };
