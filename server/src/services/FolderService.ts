import { getCustomRepository, Repository } from "typeorm";
import { Folder } from "../entities/Folder";
import { FolderRepository } from "../repositorys/FolderRepository";

class FolderService {
  private folderRepository: Repository<Folder>;

  constructor() {
    this.folderRepository = getCustomRepository(FolderRepository);
  }

  async create({ path }: IFolder) {
    const folderAlreadyExist = await this.folderRepository.findOne({
      path,
    });

    if (folderAlreadyExist) {
      return;
    }

    const folder = this.folderRepository.create({
      path,
    });

    await this.folderRepository.save(folder);
    return folder;
  }

  async showFolderContent({ id }: IFolder) {
    const folder = await this.folderRepository.findOne({
      where: { id },
    });

    return folder;
  }
}

export { FolderService };
