import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbComentario1620422620157 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_comentario",
        columns: [
          {
            name: "cd_comentario",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "ds_comentario",
            type: "varchar",
            length: "250",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_comentario");
  }
}
