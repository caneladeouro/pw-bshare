import { User } from "../entities/User";

export default {
  render(user: User) {
    return {
      id: user.id,
      front_cover: user.front_cover,
      username: user.username,
      email: user.email,
    };
  },

  renderMany(users: User[]) {
    return users.map((user) => this.render(user));
  },
};
