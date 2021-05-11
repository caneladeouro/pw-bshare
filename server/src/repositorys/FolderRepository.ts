import { EntityRepository, Repository } from "typeorm";
import { Folder } from "../entities/Folder";

@EntityRepository(Folder)
class FolderRepository extends Repository<Folder> {}

export { FolderRepository };
