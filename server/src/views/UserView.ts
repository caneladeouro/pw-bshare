import { User } from "../entities/User";
import projectView from "./ProjectView";

export default {
  render(user: User, showProjects = false) {
    const projects = showProjects
      ? projectView.renderUserMany(user.projects, user.id)
      : undefined;

    return {
      id: user.id,
      front_cover: user.front_cover,
      username: user.username,
      email: user.email,
      description: user.description,
      projects: showProjects ? projects.all_projects : undefined,
      created_projects: showProjects ? projects.created_projects : undefined,
    };
  },

  renderMany(users: User[], showProjects = false) {
    return users.map((user) => this.render(user, showProjects));
  },
};
