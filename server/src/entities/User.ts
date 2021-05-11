import { Column, Entity, PrimaryColumn } from "typeorm";
import { v4 as uuid } from "uuid";

@Entity("tb_usuario")
class User {
  @PrimaryColumn({ name: "cd_usuario" })
  id: string;

  @Column({ name: "im_capa" })
  front_cover: string;

  @Column({ name: "nm_usuario" })
  username: string;

  @Column({ name: "cd_senha" })
  password: string;

  @Column({ name: "nm_email" })
  email: string;

  constructor() {
    if (!this.id) {
      this.id = uuid();
    }
  }
}

export { User };
