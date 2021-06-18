import { Project } from "../entities/Project";
import imageView from "./ImageView";
import userView from "./UserView";

export default {
  render(project: Project) {
    return {
      id: project.id,
      title: project.title,
      description: project.description,
      blender_version: project.blender_version,
      render_engine: project.render_engine,
      main_image: project.main_image
        ? `http://${process.env.HOST}/uploads/${project.main_image}`
        : undefined,
      price: project.price,
      project: `http://${process.env.HOST}/uploads/${project.project}`,
      active: project.active,
      category: project.category,
      images: imageView.renderMany(project.images),
      author: userView.render(project.author),
      folders: project.folders,
    };
  },

  renderMany(projects: Project[]) {
    return projects.map((project) => this.render(project));
  },

  renderUserMany(projects: Project[], author_id: string) {
    var created_projects = [];
    var all_projects = [];

    projects.map((project) => {
      let aux_project = this.render(project);

      if (project.author_id == author_id) {
        created_projects.push(aux_project);
      }
      all_projects.push(aux_project);
    });

    return { created_projects, all_projects };
  },
};
