import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbTagProjeto1620432772949 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_tag_projeto",
        columns: [
          {
            name: "cd_projeto",
            type: "char",
            length: "36",
          },
          {
            name: "cd_tag",
            type: "char",
            length: "36",
          },
        ],
        foreignKeys: [
          {
            name: "fk_tb_projeto_tb_tag_projeto",
            columnNames: ["cd_projeto"],
            referencedTableName: "tb_projeto",
            referencedColumnNames: ["cd_projeto"],
            onUpdate: "CASCADE",
          },
          {
            name: "fk_tb_tag_tb_tag_projeto",
            columnNames: ["cd_tag"],
            referencedTableName: "tb_tag",
            referencedColumnNames: ["cd_tag"],
            onUpdate: "CASCADE",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_tag");
  }
}
