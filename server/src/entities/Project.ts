import {
  Column,
  Entity,
  JoinColumn,
  JoinTable,
  ManyToMany,
  ManyToOne,
  OneToMany,
  PrimaryColumn,
} from "typeorm";
import { v4 as uuid } from "uuid";
import { Category } from "./Category";
import { Folder } from "./Folder";
import { Image } from "./Image";
import { User } from "./User";

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
  category_id: string;

  @Column({ name: "cd_usuario" })
  author_id: string;

  @JoinColumn({ name: "cd_usuario" })
  @ManyToOne(() => User)
  author: User;

  @ManyToMany(() => Folder)
  @JoinTable({
    name: "tb_pasta_projeto",
    joinColumn: { name: "cd_projeto", referencedColumnName: "id" },
    inverseJoinColumn: { name: "cd_pasta", referencedColumnName: "id" },
  })
  folders: Folder[];

  @JoinColumn({ name: "cd_categoria" })
  @ManyToOne(() => Category)
  category: Category;

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
