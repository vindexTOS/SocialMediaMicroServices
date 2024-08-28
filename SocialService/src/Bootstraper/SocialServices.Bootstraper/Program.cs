using SocialServices.Modules.Comments.Api;
using SocialServices.Shared.Infrastructure;

var builder = WebApplication.CreateBuilder(args);
{
    builder.Services.AddControllers();
    builder.Services.AddSwaggerGen();
    builder.Services.AddInfrastructure();
    builder.Services.AddCommentsModule();
}
var app = builder.Build();
{
    if (builder.Environment.IsDevelopment())
    {
        app.UseSwagger();
        app.UseSwaggerUI();
        app.UseDeveloperExceptionPage();
    }

    app.UseInfrastructure();
    app.UseRouting();
    app.MapControllers();
    app.Run();
}


