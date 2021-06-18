import { getCustomRepository, Repository } from "typeorm";
import { User } from "../entities/User";
import { UserRepository } from "../repositorys/UserRepository";
import { createHash } from "crypto";
import userView from "../views/UserView";

class UserService {
  private userRepository: Repository<User>;

  constructor() {
    this.userRepository = getCustomRepository(UserRepository);
  }

  async create({ username, email, password }: IUser) {
    const userAlreadyExist = await this.userRepository.findOne({
      where: [{ username }, { email }],
    });

    if (userAlreadyExist) {
      return userAlreadyExist;
    }

    password = createHash("sha256").update(password).digest("hex");

    const user = this.userRepository.create({
      username,
      email,
      password,
    });

    await this.userRepository.save(user);
    return user;
  }

  async showAll() {
    const users = await this.userRepository.find({ relations: ["projects"] });

    return userView.renderMany(users);
  }

  async show(id: string) {
    const user = await this.userRepository.findOne({
      where: { id },
      relations: [
        "projects",
        "projects.images",
        "projects.category",
        "projects.author",
        "projects.folders",
      ],
    });

    return userView.render(user, true);
  }

  async login(name_our_email: string, password: string) {
    password = createHash("sha256").update(password).digest("hex");

    const user = await this.userRepository.findOne({
      where: [
        { username: name_our_email, password },
        { email: name_our_email, password },
      ],
      relations: [
        "projects",
        "projects.images",
        "projects.category",
        "projects.author",
        "projects.folders",
      ],
    });

    return userView.render(user, true);
  }
}

export { UserService };
