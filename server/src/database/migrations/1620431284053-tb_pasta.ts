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
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_pasta");
  }
}
