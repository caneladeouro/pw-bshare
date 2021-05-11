import { getCustomRepository, Repository } from "typeorm";
import { User } from "../entities/User";
import { UserRepository } from "../repositorys/UserRepository";
import { createHash } from "crypto";

export default class UserService {
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
}
