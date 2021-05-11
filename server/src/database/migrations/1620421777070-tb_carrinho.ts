import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbCarrinho1620421777070 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_carrinho",
        columns: [
          {
            name: "cd_carrinho",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "dt_ultima_alteracao",
            type: "date",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_carrinho");
  }
}
