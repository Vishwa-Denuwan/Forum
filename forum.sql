create table user(
    user_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_name  VARCHAR(255) NOT NULL ,
    email  VARCHAR(255) NOT NULL,
    pass1  VARCHAR(255) NOT NULL,
    pass2  VARCHAR(255) NOT NULL
);
create table question(
    question_id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    subdate DATETIME,
    catagary VARCHAR(255) NOT NULL,
    question VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id) 
);
create table answer(
    answer_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    question_id INT NOT NULL,
    subdate DATETIME NOT NULL,
    answer VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (question_id) REFERENCES question(question_id) 
);
create table vote(
    answer_id INT NOT NULL ,
    user_name VARCHAR(255) NOT NULL,
    vote VARCHAR(255) NOT NULL,
    UNIQUE(answer_id,user_name)
);




select question_id,answer_id,count(vote) as ValueFrequency from vote where vote=1 group by question_id,answer_id order by ValueFrequency desc;



























select answer.*,count(vote.vote) as vcount from answer left join vote on answer.answer_id=vote.answer_id and answer.question_id=vote.question_id where vote.vote=1 and vote.question_id=5 group by answer.answer order by vcount desc;
select answer.*,count(vote.vote) as vcount from answer left join vote on answer.answer_id=vote.answer_id and answer.question_id=vote.question_id where vote.vote=1 and vote.question_id=5 group by answer.answer order by vcount desc;
select answer.*,count(vote.vote) as vcount from answer left join vote on answer.answer_id=vote.answer_id and answer.question_id=vote.question_id where vote.vote=1 and vote.question_id=5 group by answer.answer order by vcount desc;