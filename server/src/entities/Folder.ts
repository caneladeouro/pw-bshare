import { Column, Entity, PrimaryColumn } from "typeorm";
import { v4 as uuid } from "uuid";

@Entity("tb_pasta")
class Folder {
  @PrimaryColumn({ name: "cd_pasta" })
  id: string;

  @Column({ name: "nm_caminho_pasta" })
  path: string;

  constructor() {
    if (!this.id) {
      this.id = uuid();
    }
  }
}

export { Folder };
