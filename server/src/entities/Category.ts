import { Column, Entity, PrimaryColumn } from "typeorm";

@Entity("tb_categoria")
class Category {
  @PrimaryColumn({ name: "cd_categoria" })
  id: string;

  @Column({ name: "nm_categoria" })
  category: string;
}

export { Category };
