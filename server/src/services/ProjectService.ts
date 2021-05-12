import { getCustomRepository, Repository } from "typeorm";
import { Project } from "../entities/Project";
import { ProjectRepository } from "../repositorys/ProjectRepository";

class ProjectService {
  private projectRepository: Repository<Project>;

  constructor() {
    this.projectRepository = getCustomRepository(ProjectRepository);
  }

  async create({
    title,
    description,
    price,
    author,
    comment,
    main_image,
    created_at,
  }: IProject) {
    const projectAlreadyExist = this.projectRepository.findOne({
      title,
    });

    if (projectAlreadyExist) {
      return;
    }
  }

  async showAll() {
    const projects = await this.projectRepository.find();

    return projects;
  }
}

export { ProjectService };
