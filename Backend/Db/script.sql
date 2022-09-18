USE [master]
GO
/****** Object:  Database [db_fullstack]    Script Date: 18/09/2022 20:31:07 ******/
CREATE DATABASE [db_fullstack]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'db_fullstack', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL13.SQLEXPRESS\MSSQL\DATA\db_fullstack.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'db_fullstack_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL13.SQLEXPRESS\MSSQL\DATA\db_fullstack_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [db_fullstack] SET COMPATIBILITY_LEVEL = 130
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [db_fullstack].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [db_fullstack] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [db_fullstack] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [db_fullstack] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [db_fullstack] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [db_fullstack] SET ARITHABORT OFF 
GO
ALTER DATABASE [db_fullstack] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [db_fullstack] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [db_fullstack] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [db_fullstack] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [db_fullstack] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [db_fullstack] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [db_fullstack] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [db_fullstack] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [db_fullstack] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [db_fullstack] SET  DISABLE_BROKER 
GO
ALTER DATABASE [db_fullstack] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [db_fullstack] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [db_fullstack] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [db_fullstack] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [db_fullstack] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [db_fullstack] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [db_fullstack] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [db_fullstack] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [db_fullstack] SET  MULTI_USER 
GO
ALTER DATABASE [db_fullstack] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [db_fullstack] SET DB_CHAINING OFF 
GO
ALTER DATABASE [db_fullstack] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [db_fullstack] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [db_fullstack] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [db_fullstack] SET QUERY_STORE = OFF
GO
USE [db_fullstack]
GO
ALTER DATABASE SCOPED CONFIGURATION SET LEGACY_CARDINALITY_ESTIMATION = OFF;
GO
ALTER DATABASE SCOPED CONFIGURATION SET MAXDOP = 0;
GO
ALTER DATABASE SCOPED CONFIGURATION SET PARAMETER_SNIFFING = ON;
GO
ALTER DATABASE SCOPED CONFIGURATION SET QUERY_OPTIMIZER_HOTFIXES = OFF;
GO
USE [db_fullstack]
GO
/****** Object:  Table [dbo].[tb_employees]    Script Date: 18/09/2022 20:31:08 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tb_employees](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Emp_Id] [varchar](50) NULL,
	[FirstName] [nvarchar](35) NULL,
	[LastName] [nvarchar](35) NULL,
	[DateOfBirth] [varchar](50) NULL,
	[Age] [int] NULL,
	[Address] [nvarchar](150) NULL,
	[Created_at] [datetime] NULL,
 CONSTRAINT [PK_tb_employees] PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[tb_employees] ON 
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (8, N'Emp004', N'Chanphone', N'Philavong', N'1992-03-02', 30, N'Phoukhoun, Luangprabang, Laos', CAST(N'2022-09-17T13:07:54.737' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (9, N'Emp005', N'Siphone', N'Lathilard', N'1995-03-29', 27, N'Viengchanh, Luangprabang, Laos', CAST(N'2022-09-17T13:09:55.270' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (10, N'Emp006', N'Somphet', N'Tempboy', N'1993-08-24', 29, N'Pak-Ou, Luangprabang, Laos', CAST(N'2022-09-17T13:11:01.980' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (11, N'Emp007', N'Bounthan', N'Sithanya', N'1990-01-28', 33, N'Luangprabang, Laos, PDR', CAST(N'2022-09-17T13:12:08.980' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (12, N'Emp008', N'Phayvanh', N'Phoutthavong', N'1993-08-24', 29, N'Meuangbang, Oudomxay, Laos', CAST(N'2022-09-17T13:14:00.220' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (13, N'Emp009', N'Chansamone', N'Litdavong', N'1987-10-02', 37, N'Bo-tene, Bokeo, Laos', CAST(N'2022-09-17T13:15:50.037' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (14, N'Emp010', N'Daovanh', N'Keosalar', N'1988-01-23', 39, N'Xamneua, Houaphanh, Laos', CAST(N'2022-09-17T13:18:35.027' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (15, N'Emp011', N'Bounsavanh', N'Keophila', N'1989-03-03', 36, N'Xamneua, Houaphanh, Laos', CAST(N'2022-09-17T15:13:53.953' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (16, N'Emp012', N'Khensuly', N'Kunyavong', N'1992-12-20', 32, N'Meuangxay, Oudomxay, Laos', CAST(N'2022-09-17T15:14:42.687' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (17, N'Emp013', N'Maly', N'Oulalong', N'1995-11-26', 32, N'Meuangphieng, Xaiyabouly, Laos', CAST(N'2022-09-17T15:15:22.783' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (18, N'Emp014', N'Chanthala', N'Phonephet', N'1996-08-22', 30, N'Meuangphieng, Xaiyabouly, Laos', CAST(N'2022-09-17T15:15:54.790' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (19, N'Emp015', N'Korly', N'Somvong', N'1990-04-13', 32, N'nayao, Xaiyabouly, Laos', CAST(N'2022-09-17T15:16:32.010' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (21, N'Emp016', N'Anni', N'Khindavone', N'2000-05-21', 22, N'Naviengkham, Luangprabang, Laos', CAST(N'2022-09-17T16:30:09.517' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (25, N'Emp001', N'Kicks Me', N'Yang', N'2001-09-23', 21, N'Laos', CAST(N'2022-09-17T16:30:09.517' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (26, N'Emp002', N'Phoutthavong', N'Khamla', N'2002-04-09', 20, N'Luangprabang, Laos', CAST(N'2022-09-17T16:30:09.517' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (27, N'Emp003', N'Johny', N'Yang', N'1999-09-30', 23, N'Nongviengkham, Vientiane, Laos', CAST(N'2022-09-17T16:30:09.517' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (28, N'Emp017', N'Denne', N'Krossing', N'1993-11-25', 28, N'Naxai, Vientiane, Laos', CAST(N'2022-09-17T16:30:09.517' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (31, N'Emp018', N'Khanthaly', N'Vilaiphone', N'1991-06-06', 31, N'ບ້ານນາແລ, ເມືອງແປກ, ແຂວງບາດົງ, ປະເທດລາວ', CAST(N'2022-09-17T20:17:00.290' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (33, N'Emp019', N'Denny', N'Dosing', N'2008-11-30', 13, N'Lao PDR', CAST(N'2022-09-18T17:43:12.460' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (34, N'Emp020', N'Keovilay', N'Siphanya', N'1985-06-25', 37, N'Xiengkhuang, Laos PDR', CAST(N'2022-09-18T17:44:01.207' AS DateTime))
GO
INSERT [dbo].[tb_employees] ([ID], [Emp_Id], [FirstName], [LastName], [DateOfBirth], [Age], [Address], [Created_at]) VALUES (35, N'Emp021', N'Chantee', N'vilayvong', N'1979-10-13', 42, N'Laos', CAST(N'2022-09-18T18:03:44.280' AS DateTime))
GO
SET IDENTITY_INSERT [dbo].[tb_employees] OFF
GO
USE [master]
GO
ALTER DATABASE [db_fullstack] SET  READ_WRITE 
GO
