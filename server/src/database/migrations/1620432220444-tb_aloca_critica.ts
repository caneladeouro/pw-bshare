import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbAlocaCritica1620432220444 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_aloca_critica",
        columns: [
          {
            name: "cd_denuncia",
            type: "char",
            length: "36",
          },
          {
            name: "cd_projeto",
            type: "char",
            length: "36",
            isNullable: true,
          },
          {
            name: "cd_comentario",
            type: "char",
            length: "36",
            isNullable: true,
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_aloca_critica");
  }
}
