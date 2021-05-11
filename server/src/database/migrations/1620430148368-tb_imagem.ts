import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbImagem1620430148368 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_imagem",
        columns: [
          {
            name: "cd_imagem",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "im_imagem",
            type: "varchar",
            length: "60",
          },
          {
            name: "cd_projeto",
            type: "char",
            length: "36",
          },
        ],
        foreignKeys: [
          {
            name: "fk_tb_projeto_tb_imagem",
            columnNames: ["cd_projeto"],
            referencedTableName: "tb_projeto",
            referencedColumnNames: ["cd_projeto"],
            onUpdate: "CASCADE",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_imagem");
  }
}
