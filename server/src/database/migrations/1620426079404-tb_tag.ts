import { MigrationInterface, QueryRunner, Table } from "typeorm";

export class tbTag1620426079404 implements MigrationInterface {
  public async up(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.createTable(
      new Table({
        name: "tb_tag",
        columns: [
          {
            name: "cd_tag",
            type: "char",
            length: "36",
            isPrimary: true,
          },
          {
            name: "nm_tag",
            type: "varchar",
            length: "45",
          },
        ],
      })
    );
  }

  public async down(queryRunner: QueryRunner): Promise<void> {
    await queryRunner.dropTable("tb_tag");
  }
}
