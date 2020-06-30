CREATE TABLE `student`(
  `id` INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
  `name` varchar(16) NOT NULL DEFAULT "",
  `mobile` varchar(16) NOT NULL DEFAULT "",
  `status` int unsigned NOT NULL DEFAULT "0",
  `attr` text,
  `creationTime` datetime,
  `updateTime` datetime 
);
CREATE UNIQUE INDEX  `idx_stu_mobile` on `student` (`mobile`);
CREATE INDEX  `idx_stu_name` on `student` (`name`);

CREATE TABLE `lesson`(
  `id` INTEGER  NOT NULL PRIMARY KEY AUTOINCREMENT,
  `name` varchar(16) NOT NULL DEFAULT "",
  `status` int unsigned NOT NULL DEFAULT "0",
  `attr` text,
  `creationTime` datetime,
  `updateTime` datetime 
);
CREATE UNIQUE INDEX  `idx_lesson_name` on `lesson` (`name`);

CREATE TABLE `student_score`(
  `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
  `lessonId` INTEGER NOT NULL DEFAULT "0",
  `studentId` INTEGER NOT NULL DEFAULT "0",
  `score` INTEGER NOT NULL DEFAULT "0",
  `creationTime` datetime,
  `updateTime` datetime 
);
CREATE INDEX  `idx_ss_lessonId` on `student_score` (`lessonId`);
CREATE INDEX  `idx_ss_studentId` on `student_score` (`studentId`);
