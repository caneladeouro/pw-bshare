import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbPasta1620431284053 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_pasta",
        columns: [
          {
            name: "cd_pasta",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "nm_caminho_pasta",
            type: "varchar",
            length: "60",
          },
          {
            name: "cd_usuario",
            type: "char",
            length: "36",
          },
          {
            name: "cd_carrinho",
            type: "char",
            length: "36",
            isNullable: true,
          },
        ],
        foreignKeys: [
          {
            name: "fk_tb_usuario_tb_pasta",
            columnNames: ["cd_usuario"],
            referencedTableName: "tb_usuario",
            referencedColumnNames: ["cd_usuario"],
            onUpdate: "CASCADE",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_pasta");
  }
}
