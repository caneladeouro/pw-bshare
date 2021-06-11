import { getCustomRepository, Repository } from "typeorm";
import { Project } from "../entities/Project";
import { ProjectRepository } from "../repositorys/ProjectRepository";
import projectView from "../views/ProjectView";

class ProjectService {
  private projectRepository: Repository<Project>;
  private relations = ["images", "category", "author"];

  constructor() {
    this.projectRepository = getCustomRepository(ProjectRepository);
  }

  async create(data: IProject) {
    const projectAlreadyExist = await this.projectRepository.findOne({
      where: { title: data.title },
    });

    if (projectAlreadyExist) {
      return projectAlreadyExist;
    }

    const project = this.projectRepository.create({
      title: data.title,
      description: data.description,
      main_image: data.main_image,
      category_id: data.category_id,
      price: data.price,
      project: data.project,
      author_id: data.author_id,
      images: data.images,
      active: true,
    });

    await this.projectRepository.save(project);
    return project;
  }

  async showAll() {
    const projects = await this.projectRepository.find({
      relations: this.relations,
    });

    return projectView.renderMany(projects);
  }

  async showById(id: string) {
    const project = await this.projectRepository.findOne({
      where: { id },
      relations: this.relations,
    });

    return projectView.render(project);
  }

  async showByUser(author_id: string) {
    const projects = await this.projectRepository.find({
      where: { author_id },
      relations: this.relations,
    });

    return projectView.renderMany(projects);
  }
}

export { ProjectService };
