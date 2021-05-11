import { Column, Entity, PrimaryColumn } from "typeorm";
import { v4 as uuid } from "uuid";

@Entity("tb_pasta")
class Folder {
  @PrimaryColumn({ name: "cd_pasta" })
  id: string;

  @Column({ name: "nm_caminho_pasta" })
  path: string;

  @Column({ name: "cd_usuario" })
  user_id: string;

  @Column({ name: "cd_carrinho" })
  card_id: string;

  constructor() {
    if (!this.id) {
      this.id = uuid();
    }
  }
}

export { Folder };
