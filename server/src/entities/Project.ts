import { Column, Entity, JoinColumn, OneToMany, PrimaryColumn } from "typeorm";
import { v4 as uuid } from "uuid";
import { Image } from "./Image";

@Entity("tb_projeto")
class Project {
  @PrimaryColumn({ name: "cd_projeto" })
  id: string;

  @Column({ name: "nm_titulo" })
  title: string;

  @Column({ name: "ds_projeto" })
  description: string;

  @Column({ name: "im_principal" })
  main_image: string;

  @Column({ name: "vl_preco_projeto" })
  price: string;

  @Column({ name: "im_projeto" })
  project: string;

  @Column({ name: "ic_ativo" })
  active: boolean;

  @Column({ name: "cd_categoria" })
  category: string;

  @JoinColumn({ name: "cd_projeto" })
  @OneToMany(() => Image, (image) => image.project, {
    cascade: ["insert", "update"],
  })
  images: Image[];

  constructor() {
    if (!this.id) {
      this.id = uuid();
    }
  }
}

export { Project };
