import { Column, Entity, OneToOne, PrimaryColumn, JoinColumn } from "typeorm";
import { v4 as uuid } from "uuid";
import { Project } from "./Project";

@Entity("tb_imagem")
class Image {
  @PrimaryColumn({ name: "cd_imagem" })
  id: string;

  @Column({ name: "im_imagem" })
  image: string;

  @OneToOne(() => Project, (project) => project.images)
  @JoinColumn({ name: "cd_projeto" })
  project: Project;

  constructor() {
    if (!this.id) {
      this.id = uuid();
    }
  }
}

export { Image };
