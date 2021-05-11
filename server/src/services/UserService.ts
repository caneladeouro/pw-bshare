import { getCustomRepository, Repository } from "typeorm";
import { User } from "../entities/User";
import { UserRepository } from "../repositorys/UserRepository";
import { createHash } from "crypto";

export default class UserService {
  // private userRepository: Repository<User>;

  // constructor() {
  //   this.userRepository =
  // }

  async create({ username, email, password }: IUser) {
    const userRepository = getCustomRepository(UserRepository);

    const userAlreadyExist = await userRepository.findOne({
      where: [{ username }, { email }],
    });

    if (userAlreadyExist) {
      return;
    }

    password = createHash("sha256").update(password).digest("hex");

    const user = userRepository.create({
      username,
      email,
      password,
    });

    await userRepository.save(user);
    return user;
  }
}
