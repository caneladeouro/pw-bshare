import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbProjeto1620429001334 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_projeto",
        columns: [
          {
            name: "cd_projeto",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "nm_titulo",
            type: "varchar",
            length: "45",
          },
          {
            name: "ds_projeto",
            type: "varchar",
            length: "500",
            isNullable: true,
          },
          {
            name: "im_principal",
            type: "varchar",
            length: "60",
          },
          {
            name: "qt_classificacao_idade",
            type: "int",
          },
          {
            name: "vl_preco_projeto",
            type: "double",
          },
          {
            name: "im_prjeto",
            type: "varchar",
            length: "60",
          },
          {
            name: "ic_ativo",
            type: "bool",
          },
          {
            name: "cd_categoria",
            type: "char",
            length: "36",
          },
        ],
        foreignKeys: [
          {
            name: "fk_tb_categoria_tb_projeto",
            columnNames: ["cd_categoria"],
            referencedTableName: "tb_categoria",
            referencedColumnNames: ["cd_categoria"],
            onUpdate: "CASCADE",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_projeto");
  }
}
