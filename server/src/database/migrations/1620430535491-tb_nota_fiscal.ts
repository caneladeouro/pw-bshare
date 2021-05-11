import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbNotaFiscal1620430535491 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_nota_fiscal",
        columns: [
          {
            name: "cd_nota_fiscal",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "dt_compra_projeto",
            type: "date",
          },
          {
            name: "cd_carrinho",
            type: "char",
            length: "36",
          },
        ],
        foreignKeys: [
          {
            name: "fk_tb_carrinho_tb_nota_fiscal",
            columnNames: ["cd_carrinho"],
            referencedTableName: "tb_carrinho",
            referencedColumnNames: ["cd_carrinho"],
            onUpdate: "CASCADE",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_nota_fiscal");
  }
}
