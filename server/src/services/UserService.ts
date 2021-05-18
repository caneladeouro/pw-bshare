import { getCustomRepository, Repository } from "typeorm";
import { User } from "../entities/User";
import { UserRepository } from "../repositorys/UserRepository";
import { createHash } from "crypto";

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
      return;
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
    const users = await this.userRepository.find();

    return users;
  }

  async show(id: string) {
    const user = await this.userRepository.findOne({
      id,
    });

    return user;
  }

  async login(name_our_email: string, password: string) {
    password = createHash("sha256").update(password).digest("hex");

    const user = await this.userRepository.findOne({
      where: [
        { username: name_our_email, password },
        { email: name_our_email, password },
      ],
    });

    return user;
  }
}

export { UserService };
