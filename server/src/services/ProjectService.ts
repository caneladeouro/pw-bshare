import { getCustomRepository, Repository } from "typeorm";
import { Project } from "../entities/Project";
import { ProjectRepository } from "../repositorys/ProjectRepository";

class ProjectService {
  private projectRepository: Repository<Project>;

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
      category: data.category,
      price: data.price,
      project: data.project,
      images: data.images,
      active: true,
    });

    await this.projectRepository.save(project);
    return project;
  }

  async showAll() {
    const projects = await this.projectRepository.find({
      relations: ["images"],
    });

    return projects.map((project) => {
      return {
        ...project,
        images: project.images.map((image) => {
          return {
            ...image,
            image: `http://127.0.0.1:3100/uploads/${image.image}`,
          };
        }),
      };
    });
  }
}

export { ProjectService };
