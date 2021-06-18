import { getCustomRepository, Like, Repository } from "typeorm";
import { Project } from "../entities/Project";
import { IProject } from "../interfaces/ProjectInterface";
import { ProjectRepository } from "../repositorys/ProjectRepository";
import projectView from "../views/ProjectView";

class ProjectService {
  private projectRepository: Repository<Project>;
  private relations = ["images", "category", "author", "folders"];

  constructor() {
    this.projectRepository = getCustomRepository(ProjectRepository);
  }

  async create(data: IProject) {
    const dateNow = new Date(Date.now());
    const projectAlreadyExist = await this.projectRepository.findOne({
      where: { title: data.title },
    });

    if (projectAlreadyExist) {
      return projectAlreadyExist;
    }

    const project = this.projectRepository.create({
      title: data.title,
      description: data.description,
      blender_version: data.blender_version,
      main_image: data.main_image,
      render_engine: data.render_engine,
      category_id: data.category_id,
      post_date: `${dateNow.getFullYear()}-${(
        "0" +
        (dateNow.getMonth() + 1)
      ).slice(-2)}-${dateNow.getDate()}`,
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

  async showByAttibute(attribute: string) {
    const projects = await this.projectRepository.find({
      where: { title: Like(`%${attribute}%`) },
      relations: this.relations,
    });

    return projectView.renderMany(projects);
  }
}

export { ProjectService };
