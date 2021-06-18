import {
  Column,
  Entity,
  JoinColumn,
  ManyToOne,
  OneToMany,
  PrimaryColumn,
} from "typeorm";
import { v4 as uuid } from "uuid";
import { Project } from "./Project";

@Entity("tb_usuario")
class User {
  @PrimaryColumn({ name: "cd_usuario" })
  id: string;

  @Column({ name: "im_capa" })
  front_cover: string;

  @Column({ name: "nm_usuario" })
  username: string;

  @Column({ name: "ds_usuario" })
  description: string;

  @Column({ name: "cd_senha" })
  password: string;

  @Column({ name: "nm_email" })
  email: string;

  @OneToMany(() => Project, (project) => project.author)
  @JoinColumn({ name: "cd_usuario" })
  projects: Project[];

  constructor() {
    if (!this.id) {
      this.id = uuid();
    }
  }
}

export { User };
