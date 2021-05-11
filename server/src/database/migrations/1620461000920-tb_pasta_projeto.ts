import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbPastaProjeto1620461000920 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_pasta_projeto",
        columns: [
          {
            name: "cd_pasta",
            type: "char",
            length: "36",
          },
          {
            name: "cd_projeto",
            type: "char",
            length: "36",
          },
        ],
        foreignKeys: [
          {
            name: "fk_tb_pasta_tb_pasta_projeto",
            columnNames: ["cd_pasta"],
            referencedTableName: "tb_pasta",
            referencedColumnNames: ["cd_pasta"],
            onUpdate: "CASCADE",
          },
          {
            name: "cd_projeto",
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
    await queryRunner.dropTable("tb_pasta_projeto");
  }
}
