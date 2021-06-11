import { Project } from "../entities/Project";
import imageView from "./ImageView";
import userView from "./UserView";

export default {
  render(project: Project) {
    return {
      id: project.id,
      title: project.title,
      description: project.description,
      main_image: `http://${process.env.HOST}/uploads/${project.main_image}`,
      price: project.price,
      project: `http://${process.env.HOST}/uploads/${project.project}`,
      active: project.active,
      category: project.category,
      images: imageView.renderMany(project.images),
      author: userView.render(project.author),
      // folders: project.folders,
    };
  },

  renderMany(projects: Project[]) {
    return projects.map((project) => this.render(project));
  },
};
